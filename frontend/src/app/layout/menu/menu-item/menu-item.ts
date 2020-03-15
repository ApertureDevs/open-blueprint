export class MenuItem {

  get icon(): string {
    return this._icon;
  }

  get label(): string {
    return this._label;
  }

  get link(): string {
    return this._link;
  }

  get subItems(): { label: string; link: string }[] {
    return this._subItems;
  }

  constructor(
    private _label: string,
    private _icon: string,
    private _link: string,
    private _subItems: { label: string, link: string }[] = [],
  ) { }
}
