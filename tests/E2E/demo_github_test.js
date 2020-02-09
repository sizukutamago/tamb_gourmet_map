Feature('Test Github');

Scenario('access github top page', (I) => {
    I.amOnPage("https://github.com");
    I.see('GitHub');
});
