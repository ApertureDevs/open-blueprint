import { browser } from 'protractor';

export class AppPage {
  public navigateTo(): Promise<unknown> {
    return browser.get('http://frontend:4200/') as Promise<unknown>;
  }

  public getTitleText(): Promise<string> {
    return browser.getTitle() as Promise<string>;
  }
}
