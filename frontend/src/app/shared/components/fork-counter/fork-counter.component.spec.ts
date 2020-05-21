import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { Difficulty } from '@model/domain/blueprint/difficulty';
import { MemberStatus } from '@model/domain/team/member-status';

import { ForkCounterComponent } from './fork-counter.component';

describe('ForkCounterComponent', () => {
  let component: ForkCounterComponent;
  let fixture: ComponentFixture<ForkCounterComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ForkCounterComponent ],
      schemas: [
        CUSTOM_ELEMENTS_SCHEMA,
      ],
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ForkCounterComponent);
    component = fixture.componentInstance;
  });

  it('should create', () => {
    component.blueprint = {
      id: 'acd52d90-dd79-4793-ae17-e4ae32e30a4e',
      name: 'toaster',
      tags: [],
      difficulty: Difficulty.Hard,
      thumbnail: 'http://placehold.it/250x150',
      isOfficial: true,
      favoritesCount: 83,
      forksCount: 4,
      openIssuesCount: 12,
      shortDescription: 'short description',
      longDescription: 'long description',
      forkFrom: null,
      team: {
        id: '6a694cf2-1eb6-4675-aba0-e609958355a7',
        members: [
          {
            id: '839faca7-9a1f-4a0c-9b03-932542dd542c',
            user: {
              id: '6bf45656-4199-40c2-8167-cff64aa36f11',
              username: 'foo',
              avatar: null,
              skills: [],
              email: 'foo@mail.com',
            },
            status: MemberStatus.Enable,
            grants: [],
            invitation: null,
          }],
      },
      releases: [],
      createDate: new Date('2020-01-01'),
      updateDate: new Date('2020-02-01'),
    };
    expect(component).toBeTruthy();
  });
});
