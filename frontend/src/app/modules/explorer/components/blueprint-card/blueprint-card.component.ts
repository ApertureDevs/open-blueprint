import { Component, Input } from '@angular/core';
import { Blueprint } from '@model/blueprint';

@Component({
  selector: 'app-blueprint-card',
  templateUrl: './blueprint-card.component.html',
  styleUrls: ['./blueprint-card.component.scss'],
})
export class BlueprintCardComponent {

  @Input() public blueprint: Blueprint;
}
