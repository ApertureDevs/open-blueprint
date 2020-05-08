import { Component, OnInit } from '@angular/core';
import { Blueprint } from '@model/blueprint';
import { Difficulty } from '@model/difficulty';
import { Skill } from '@model/skill';

@Component({
  selector: 'app-explorer',
  templateUrl: './explorer.component.html',
  styleUrls: ['./explorer.component.scss'],
})
export class ExplorerComponent implements OnInit {

  public blueprints: Blueprint[] = [];

  public ngOnInit(): void {
    this.blueprints = [
      {
        owner: {
          email: 'foo@gmail.com',
          name: 'foo',
        },
        title: 'toaster',
        difficulty: Difficulty.Easy,
        thumbnail: 'http://placehold.it/250x150',
        skills: [Skill.Print, Skill.Electronic],
        isOfficial: true,
        likeCount: 83,
        createDate: new Date('01-01-2020'),
        updateDate: new Date('02-01-2020'),
      },
      {
        owner: {
          email: 'foo@gmail.com',
          name: 'foo',
        },
        title: 'toaster',
        difficulty: Difficulty.Easy,
        thumbnail: 'http://placehold.it/250x150',
        skills: [Skill.Print, Skill.Electronic],
        isOfficial: true,
        likeCount: 83,
        createDate: new Date('01-01-2020'),
        updateDate: new Date('02-01-2020'),
      },
      {
        owner: {
          email: 'foo@gmail.com',
          name: 'foo',
        },
        title: 'toaster',
        difficulty: Difficulty.Easy,
        thumbnail: 'http://placehold.it/250x150',
        skills: [Skill.Print, Skill.Electronic],
        isOfficial: true,
        likeCount: 83,
        createDate: new Date('01-01-2020'),
        updateDate: new Date('02-01-2020'),
      },
    ];
  }
}
