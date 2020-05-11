import { Component, Input } from '@angular/core';
import { Blueprint } from '@model/domain/blueprint/blueprint';

@Component({
  selector: 'app-issue-counter',
  templateUrl: './issue-counter.component.html',
  styleUrls: ['./issue-counter.component.scss'],
})
export class IssueCounterComponent {
  @Input() public blueprint!: Blueprint;
  public labelMapping = {
    '=0' : 'open issue',
    '=1' : 'open issue',
    other : 'open issues',
  };
}
