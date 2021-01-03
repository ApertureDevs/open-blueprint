import { Component, OnDestroy, OnInit } from '@angular/core';
import { Subscription } from 'rxjs';
import { MenuService } from '../menu.service';

@Component({
  selector: 'app-menu-button',
  templateUrl: './button.component.html',
  styleUrls: ['./button.component.scss'],
})
export class ButtonComponent implements OnInit, OnDestroy {

  public opened = false;

  private subscriptions: Subscription[] = [];

  public constructor(
    private menuService: MenuService,
  ) { }

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

  public onClick(): void {
    this.menuService.toogle();
  }
}
