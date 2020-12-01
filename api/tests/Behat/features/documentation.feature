Feature:
    Documentation

    Scenario: Get Open API HTML documentation
        When I send a "GET" request to "/api/doc"
        Then the response status code should be 200
        And I should see a "#logo" element
        And I should see a "#swagger-ui" element

    Scenario: Get Open API JSON documentation
        When I send a "GET" request to "/api/doc.json"
        Then the response status code should be 200
        And the response should be in JSON
        And the JSON node "openapi" should be equal to "3.0.0"
        And the JSON node "info.version" should be equal to "1.0.0"
        And the JSON node "paths" should have 3 elements
