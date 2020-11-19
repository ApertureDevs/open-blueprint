Feature:
    Documentation

    Scenario: Get Open API HTML documentation
        When I send a "GET" request to "/api/doc"
        Then the response status code should be 200
        And I should see a "#logo" element
        And I should see a "#swagger-ui" element

    Scenario: Get Open API HTML documentation
        When I send a "GET" request to "/api/doc.json"
        Then the response status code should be 200
        And the response should be in JSON
