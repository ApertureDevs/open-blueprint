import { Component, Input } from '@angular/core';
import { Difficulty } from '@model/domain/blueprint/difficulty';

@Component({
  selector: 'app-difficulty-badge',
  templateUrl: './difficulty-badge.component.html',
  styleUrls: ['./difficulty-badge.component.scss'],
})
export class DifficultyBadgeComponent {

  @Input() public difficulty!: Difficulty;

}
