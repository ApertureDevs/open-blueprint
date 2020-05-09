import { Component, Input } from '@angular/core';
import { MenuItem } from './menu-item';

@Component({
  selector: 'app-menu-item',
  templateUrl: './menu-item.component.html',
  styleUrls: ['./menu-item.component.scss'],
})
export class MenuItemComponent {

  @Input() public item!: MenuItem;
  public opened = false;

  public toogle(): void {
    this.opened = !this.opened;
  }
}
