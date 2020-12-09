Feature:
    Delete Blueprint

    Scenario: Delete a simple Blueprint
        When I send a "DELETE" request to "/api/blueprint/dadcd1ef-5654-4929-9a27-dd8dd46fa599"
        Then the response status code should be 200
        And the JSON node "id" should exist
        And the JSON node "id" should be equal to the string "dadcd1ef-5654-4929-9a27-dd8dd46fa599"
