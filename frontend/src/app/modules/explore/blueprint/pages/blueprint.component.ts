import { Component, OnDestroy, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Blueprint } from '@model/domain/blueprint/blueprint';
import { Release } from '@model/domain/blueprint/release';
import { Subscription } from 'rxjs';
import { map, switchMap } from 'rxjs/operators';
import { BlueprintService } from '../../../../data/services/blueprint.service';

@Component({
  selector: 'app-blueprint',
  templateUrl: './blueprint.component.html',
  styleUrls: ['./blueprint.component.scss'],
})
export class BlueprintComponent implements OnInit, OnDestroy {

  public loading!: boolean;
  public blueprint!: Blueprint;
  public selectedRelease!: Release;
  public isFavorite!: boolean;

  private subscriptions: Subscription[] = [];

  constructor(
    private route: ActivatedRoute,
    private blueprintService: BlueprintService,
  ) { }

  public ngOnInit(): void {
    this.loading = true;
    // TODO: replace static isFavorite by api call
    this.isFavorite = false;
    const subscription = this.route.paramMap.pipe(
      map((paramMap) => {
        if (!paramMap.has('id')) {
          throw new Error('This component require a Blueprint id route parameter.');
        }
        const blueprintId = paramMap.get('id');
        if (typeof blueprintId !== 'string') {
          throw new Error('This component require a Blueprint id route parameter.');
        }
        return blueprintId;
      }),
      switchMap((id) => this.blueprintService.getItem(id)),
    ).subscribe((blueprint) => {
      this.blueprint = blueprint;
      this.selectedRelease = blueprint.releases[0];
      this.loading = false;
    });
    this.subscriptions.push(subscription);
  }

  public ngOnDestroy(): void {
    this.subscriptions.forEach((subscription) => subscription.unsubscribe());
  }

  public onSelectedReleaseChange(release: Release): void {
    this.selectedRelease = release;
  }

  public onFavoriteToggle(isFavorite: boolean): void {
    this.isFavorite = isFavorite;
  }
}
