import { Component, Input } from '@angular/core';
import { Blueprint } from '@model/domain/blueprint/blueprint';

@Component({
  selector: 'app-fork-counter',
  templateUrl: './fork-counter.component.html',
  styleUrls: ['./fork-counter.component.scss'],
})
export class ForkCounterComponent {

  @Input() public blueprint!: Blueprint;
  public labelMapping = {
    '=0' : 'fork',
    '=1' : 'fork',
    other : 'forks',
  };
}
