Feature:
    Show Team

    Scenario: Show a Team
        When I send a "GET" request to "/api/team/a1d59288-6ddf-4672-a170-9431ec99453d"
        Then the response status code should be 200
        And the JSON node "id" should exist
        And the JSON node "id" should be equal to "a1d59288-6ddf-4672-a170-9431ec99453d"
        And the JSON node "createDate" should exist
        And the JSON node "createDate" should not be null
        And the JSON node "updateDate" should exist
        And the JSON node "updateDate" should not be null

    Scenario: Request a deleted Team
        When I send a "GET" request to "/api/blueprint/0190df71-0b86-454a-a18c-f69f3e908b93"
        Then the response status code should be 500
