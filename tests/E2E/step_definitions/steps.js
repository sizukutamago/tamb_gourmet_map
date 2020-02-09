const { I } = inject();
// Add in your custom step files

Given("{string} のページに移動する", url => {
    I.amOnPage(url);
});

Then("{string} の文字が見える", matchString => {
    I.see(matchString);
});
