import { Component, EventEmitter, Input, OnInit, Output } from '@angular/core';
import { Blueprint } from '@model/domain/blueprint/blueprint';

@Component({
  selector: 'app-favorite-counter',
  templateUrl: './favorite-counter.component.html',
  styleUrls: ['./favorite-counter.component.scss'],
})
export class FavoriteCounterComponent implements OnInit {
  @Input() public blueprint!: Blueprint;
  @Input() public isFavorite!: boolean;
  @Output() public favoriteToggle: EventEmitter<boolean> = new EventEmitter();
  public favoritesCount!: number;
  public labelMapping = {
    '=0' : 'favorite',
    '=1' : 'favorite',
    other : 'favorites',
  };

  public ngOnInit(): void {
    this.favoritesCount = this.blueprint.favoritesCount;
  }

  public onFavoriteToggle(): void {
    this.isFavorite = !this.isFavorite;

    if (!this.isFavorite) {
      this.favoritesCount--;
    } else {
      this.favoritesCount++;
    }

    this.favoriteToggle.emit(this.isFavorite);
    // TODO: sent data to api
  }
}
