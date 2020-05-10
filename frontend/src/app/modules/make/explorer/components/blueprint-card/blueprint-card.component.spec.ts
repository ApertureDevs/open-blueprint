import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { Difficulty } from '@model/blueprint/difficulty';
import { Skill } from '@model/blueprint/skill';
import { BlueprintCardComponent } from './blueprint-card.component';

describe('BlueprintCardComponent', () => {
  let component: BlueprintCardComponent;
  let fixture: ComponentFixture<BlueprintCardComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ BlueprintCardComponent ],
      schemas: [
        CUSTOM_ELEMENTS_SCHEMA,
      ],
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(BlueprintCardComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    component.blueprint = {
      owner: {
        email: 'foo@gmail.com',
        name: 'foo',
      },
      title: 'toaster',
      tags: ['çooking', 'breakfast'],
      difficulty: Difficulty.Hard,
      thumbnail: 'http://placehold.it/250x150',
      skills: [Skill.Print, Skill.Electronic],
      isOfficial: true,
      likeCount: 83,
      createDate: new Date('01-01-2020'),
      updateDate: new Date('02-01-2020'),
    };
    fixture.detectChanges();

    expect(component).toBeTruthy();
  });
});
