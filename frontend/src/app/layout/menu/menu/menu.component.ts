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

  constructor(
    public menuService: MenuService,
  ) {
    this.items.push(
      new MenuItem(
        'make',
        'make',
        'make',
        [
          {
            label: 'browse',
            link: 'make/explore',
          },
          {
            label: 'history',
            link: 'make/history',
          },
        ],
      ),
    );
    this.items.push(
      new MenuItem(
        'design',
        'design',
        'design',
        [
          {
            label: 'my blueprints',
            link: 'design/list',
          },
          {
            label: 'create',
            link: 'design/create',
          },
        ],
      ),
    );
    this.items.push(
      new MenuItem(
        'contribute',
        'contribute',
        'contribute',
      ),
    );
    this.items.push(
      new MenuItem(
        'store',
        'store',
        'store',
      ),
    );
  }

  public ngOnInit(): void {
    this.subscriptions.push(this.menuService.stateChange.subscribe((opened) => {
      this.opened = opened;
    }));
  }

  public ngOnDestroy(): void {
    this.subscriptions.forEach((subscription) => {
      subscription.unsubscribe();
    });
  }
}
