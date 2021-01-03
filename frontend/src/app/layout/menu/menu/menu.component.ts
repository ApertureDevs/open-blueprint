import { Component, OnDestroy, OnInit } from '@angular/core';
import { Subscription } from 'rxjs';
import { MenuItem } from '../menu-item/menu-item';
import { MenuService } from '../menu.service';

@Component({
  selector: 'app-menu',
  templateUrl: './menu.component.html',
  styleUrls: ['./menu.component.scss'],
})
export class MenuComponent implements OnInit, OnDestroy {

  public opened = false;
  public items: MenuItem[] = [];

  private subscriptions: Subscription[] = [];

  public constructor(
    public menuService: MenuService,
  ) {
    this.items = [
      {
        label: 'make',
        icon: 'make',
        link: 'make',
        subItems: [
          {
            label: 'browse',
            link: 'explore/blueprint',
          },
          {
            label: 'history',
            link: 'make/history',
          },
        ],
      },
      {
        label: 'design',
        icon: 'design',
        link: 'design',
        subItems: [
          {
            label: 'my blueprints',
            link: 'design/list',
          },
          {
            label: 'create',
            link: 'design/create',
          },
        ],
      },
      {
        label: 'contribute',
        icon: 'contribute',
        link: 'contribute',
      },
      {
        label: 'store',
        icon: 'store',
        link: 'store',
      },
    ];
  }

  public ngOnInit(): void {
    this.subscriptions.push(this.menuService.stateChange.subscribe((opened: boolean) => {
      this.opened = opened;
    }));
  }

  public ngOnDestroy(): void {
    this.subscriptions.forEach((subscription) => {
      subscription.unsubscribe();
    });
  }
}
