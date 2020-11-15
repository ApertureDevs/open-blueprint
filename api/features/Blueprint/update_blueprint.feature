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
        And the response should be equal to:
        """
        "dadcd1ef-5654-4929-9a27-dd8dd46fa599"
        """
