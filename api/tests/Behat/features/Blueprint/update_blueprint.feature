Feature:
    Update Blueprint

    Scenario: Update a simple Blueprint
        When I send a "PUT" request to "/api/blueprint/dadcd1ef-5654-4929-9a27-dd8dd46fa599" with body:
        """
        {
            "name": "a simple blueprint update"
        }
        """
        Then the response status code should be 200
        And the JSON node "id" should exist
        And the JSON node "id" should be equal to the string "dadcd1ef-5654-4929-9a27-dd8dd46fa599"
        And I send a "GET" request to "/api/blueprint/dadcd1ef-5654-4929-9a27-dd8dd46fa599"
        And the JSON node "name" should be equal to the string "a simple blueprint update"
