import { browser, logging } from 'protractor';
import { AppPage } from './app.po';

describe('Project App', () => {
  let page: AppPage;

  beforeEach(() => {
    page = new AppPage();
  });

  it('should display a browser title', () => {
    page.navigateTo();
    expect(page.getTitleText()).toEqual('OpenBlueprint');
  });

  afterEach(async () => {
    const logs = await browser.manage().logs().get(logging.Type.BROWSER);
    expect(logs).not.toContain(jasmine.objectContaining({
      level: logging.Level.SEVERE,
    } as logging.Entry));
  });
});
