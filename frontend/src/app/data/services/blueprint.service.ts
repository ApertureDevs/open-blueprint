import { Injectable } from '@angular/core';
import { Blueprint } from '@model/blueprint/blueprint';
import { Difficulty } from '@model/blueprint/difficulty';
import { Skill } from '@model/blueprint/skill';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root',
})
export class BlueprintService {

  private blueprints = [
    {
      owner: {
        email: 'foo@gmail.com',
        name: 'foo',
      },
      title: 'toaster',
      tags: ['kitchen', 'cooking', 'breakfast'],
      difficulty: Difficulty.Hard,
      thumbnail: 'http://placehold.it/250x150',
      skills: [Skill.Print, Skill.Electronic],
      isOfficial: true,
      likeCount: 83,
      createDate: new Date('12-01-2020'),
      updateDate: new Date('12-31-2020'),
    },
    {
      owner: {
        email: 'bar@gmail.com',
        name: 'bar',
      },
      title: 'pampa',
      tags: ['cactus', 'game', 'vegetable'],
      difficulty: Difficulty.Easy,
      thumbnail: 'http://placehold.it/250x150',
      skills: [Skill.Print],
      isOfficial: false,
      likeCount: 9999,
      createDate: new Date('01-01-2020'),
      updateDate: new Date('02-01-2020'),
    },
  ];

  public getItem(): Observable<Blueprint> {
    return new Observable<Blueprint>((subscriber) => {
      setTimeout(() => {
        subscriber.next(this.blueprints[0]);
        subscriber.complete();
      }, 1000)
    });
  }

  public getCollection(): Observable<Blueprint[]> {
    return new Observable<Blueprint[]>((subscriber) => {
      setTimeout(() => {
        subscriber.next(this.blueprints);
        subscriber.complete();
      }, 1000)
    });
  }
}
