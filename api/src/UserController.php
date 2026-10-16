<?php

class UserController
{
    public function __construct(private UserGateway $gateway)
    {
    }

    public function processRequest(string $method, ?string $id): void 
    {
        if ($id) {
            $this->processResourceRequest($method, $id);
        } else {
            $this->processCollectionRequest($method);
        }
    }

    private function processResourceRequest(string $method, ?string $id): void
    {
        $user = $this->gateway->get($id);

        if (!$user) {
            http_response_code(404);
            echo json_encode(["message" => "No user found"]);
            return;
        }

        switch ($method) {
            case "GET":
                echo json_encode($user);
                break;
        }
    }

    private function processCollectionRequest(string $method): void
    {
        switch ($method) {
            case "GET":
                echo json_encode($this->gateway->getAll());
                break;
            
            case "POST":
                $data = (array) json_decode(file_get_contents("php://input"), true);

                $errors = $this->getValidationErrors($data);

                if (!empty($errors)) {
                    http_response_code(422);
                    echo json_encode(["errors" => $errors]);
                    break;
                }

                $id = $this->gateway->create($data);
                http_response_code(201);
                echo json_encode([
                    "message" => "User created",
                    "id" => $id
                ]);
                break;

            default:
                http_response_code(405);
                header("Allow: GET, POST");
        }
    }

    private function getValidationErrors(array $data): array
    {
        $errors = [];

        if (empty($data["username"])) {
            $errors[] = "A username is required";
        }

        if (empty($data["email"])) {
            $errors[] = "An email is required";
        }

        if (empty($data["password"])) {
            $errors[] = "A password is required";
        }

        return $errors;
    }
}
