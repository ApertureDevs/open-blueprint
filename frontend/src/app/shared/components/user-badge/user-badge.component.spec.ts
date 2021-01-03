import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';

import { UserBadgeComponent } from './user-badge.component';

describe('UserBadgeComponent', () => {
  let component: UserBadgeComponent;
  let fixture: ComponentFixture<UserBadgeComponent>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ UserBadgeComponent ],
      schemas: [
        CUSTOM_ELEMENTS_SCHEMA,
      ],
    })
      .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(UserBadgeComponent);
    component = fixture.componentInstance;
  });

  it('should create', () => {
    component.user = {
      id: '6391c545-a4f1-45f5-ad48-500fa23cd631',
      username: 'bar',
      avatar: null,
      skills: [],
    };
    fixture.detectChanges();
    expect(component).toBeTruthy();
  });
});
