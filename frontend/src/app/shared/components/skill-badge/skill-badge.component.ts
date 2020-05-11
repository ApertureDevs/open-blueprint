import { Component, Input, OnInit } from '@angular/core';
import { Skill } from '@model/domain/blueprint/skill';

@Component({
  selector: 'app-skill-badge',
  templateUrl: './skill-badge.component.html',
  styleUrls: ['./skill-badge.component.scss'],
})
export class SkillBadgeComponent implements OnInit {

  @Input() public skill!: Skill;
  public label!: string;

  public ngOnInit(): void {
    this.label = this.getLabel();
  }

  private getLabel(): string {
    if (this.skill === Skill.Print) {
      return '3D printing';
    }

    return this.skill;
  }
}
