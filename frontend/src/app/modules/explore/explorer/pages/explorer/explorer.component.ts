import { Component, OnDestroy, OnInit } from '@angular/core';
import { Blueprint } from '@model/domain/blueprint/blueprint';
import { Subscription } from 'rxjs';
import { BlueprintService } from '../../../../../data/services/blueprint.service';

@Component({
  templateUrl: './explorer.component.html',
  styleUrls: ['./explorer.component.scss'],
})
export class ExplorerComponent implements OnInit, OnDestroy {

  public blueprints: Blueprint[] = [];

  private subscriptions: Subscription[] = [];

  constructor(
    private blueprintService: BlueprintService,
  ) { }

  public ngOnInit(): void {
    const subscription = this.blueprintService.getCollection().subscribe((blueprints) => this.blueprints = blueprints);

    this.subscriptions.push(subscription)
  }

  public ngOnDestroy(): void {
    this.subscriptions.forEach((subscription) => subscription.unsubscribe());
  }
}
