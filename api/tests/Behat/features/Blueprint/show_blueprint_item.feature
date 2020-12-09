Feature:
    Show Blueprint Item

    Scenario: Show a Blueprint
        When I send a "GET" request to "/api/blueprint/dadcd1ef-5654-4929-9a27-dd8dd46fa599"
        Then the response status code should be 200
        And the JSON node "id" should exist
        And the JSON node "id" should be equal to "dadcd1ef-5654-4929-9a27-dd8dd46fa599"
        And the JSON node "name" should exist
        And the JSON node "name" should be equal to "new aperturedevs key ring"
        And the JSON node "createDate" should exist
        And the JSON node "createDate" should not be null
        And the JSON node "updateDate" should exist
        And the JSON node "updateDate" should not be null

    Scenario: Request a deleted Blueprint
        When I send a "GET" request to "/api/blueprint/0210624e-46cb-45dd-8c77-16874d45994c"
        Then the response status code should be 500
