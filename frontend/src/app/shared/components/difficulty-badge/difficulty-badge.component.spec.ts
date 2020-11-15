import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';
import { Difficulty } from '@model/domain/blueprint/difficulty';

import { DifficultyBadgeComponent } from './difficulty-badge.component';

describe('DifficultyBadgeComponent', () => {
  let component: DifficultyBadgeComponent;
  let fixture: ComponentFixture<DifficultyBadgeComponent>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ DifficultyBadgeComponent ],
      schemas: [
        CUSTOM_ELEMENTS_SCHEMA,
      ],
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(DifficultyBadgeComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    component.difficulty = Difficulty.Easy;
    expect(component).toBeTruthy();
  });
});
