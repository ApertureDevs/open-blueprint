Feature:
    Create Blueprint

    Scenario: Create a simple Blueprint
        When I send a "POST" request to "/api/blueprint" with body:
        """
        {
            "name": "a simple blueprint"
        }
        """
        Then the response status code should be 201
