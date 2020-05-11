import { Component, Input, OnInit } from '@angular/core';
import { Blueprint } from '@model/domain/blueprint/blueprint';
import { Release } from '@model/domain/blueprint/release';

@Component({
  selector: 'app-blueprint-card',
  templateUrl: './blueprint-card.component.html',
  styleUrls: ['./blueprint-card.component.scss'],
})
export class BlueprintCardComponent implements OnInit {

  @Input() public blueprint!: Blueprint;
  public lastRelease!: Release | null;

  public ngOnInit(): void {
    this.lastRelease = this.getLastRelease();
  }

  private getLastRelease(): Release | null {
    if (this.blueprint.releases.length === 0) {
      return null;
    }

    return this.blueprint.releases[0];
  }
}
