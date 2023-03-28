Feature:
    In order to prove that the Behat Symfony extension is correctly installed
    As a user
    I want to have a demo scenario

    Scenario: It receives a response from Symfony's kernel
        When a demo scenario sends a request to "/"
        Then the response should be received

    Scenario: It
        When I visit the page app_login
        Then chec
        Then I should see "Login"
        Then I should see "Username"
