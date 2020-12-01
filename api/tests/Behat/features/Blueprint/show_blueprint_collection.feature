Feature:
    Show Blueprint Collection

    Scenario: Show a Blueprint collection
        When I send a "GET" request to "/api/blueprint"
        Then the response status code should be 200
        And the JSON node "items" should exist
        And the JSON node "totalItems" should exist
        And the JSON node "totalItems" should be equal to the number 2

    Scenario: Show a Blueprint collection with an exact search filter
        When I send a "GET" request to "/api/blueprint?name[exact]=aperturedevs%20tshirt"
        Then the response status code should be 200
        And the JSON node "items" should exist
        And the JSON node "totalItems" should exist
        And the JSON node "totalItems" should be equal to the number 1

    Scenario: Show a Blueprint collection with a partial search filter
        When I send a "GET" request to "/api/blueprint?name[partial]=aperturedevs"
        Then the response status code should be 200
        And the JSON node "items" should exist
        And the JSON node "totalItems" should exist
        And the JSON node "totalItems" should be equal to the number 2

    Scenario: Show a Blueprint collection with an after search filter
        When I send a "GET" request to "/api/blueprint?createDate[after]=2020-01-15"
        Then the response status code should be 200
        And the JSON node "items" should exist
        And the JSON node "totalItems" should exist
        And the JSON node "totalItems" should be equal to the number 1

    Scenario: Show a Blueprint collection with a before search filter
        When I send a "GET" request to "/api/blueprint?createDate[before]=2020-01-15"
        Then the response status code should be 200
        And the JSON node "items" should exist
        And the JSON node "totalItems" should exist
        And the JSON node "totalItems" should be equal to the number 1

    Scenario: Show a Blueprint collection with combined filters
        When I send a "GET" request to "/api/blueprint?name[partial]=ring&updateDate[after]=2020-01-15"
        Then the response status code should be 200
        And the JSON node "items" should exist
        And the JSON node "totalItems" should exist
        And the JSON node "totalItems" should be equal to the number 0

    Scenario: Show a Blueprint collection without results
        When I send a "GET" request to "/api/blueprint?name[exact]=unknown"
        Then the response status code should be 200
        And the JSON node "items" should exist
        And the JSON node "totalItems" should exist
        And the JSON node "totalItems" should be equal to the number 0

    Scenario: Show a Blueprint collection with an unknown filter
        When I send a "GET" request to "/api/blueprint?name[unknown]=aperturedevs%20tshirt"
        Then the response status code should be 200
