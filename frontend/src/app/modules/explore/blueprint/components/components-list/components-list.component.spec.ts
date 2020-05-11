import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ComponentsListComponent } from './components-list.component';

describe('ComponentListComponent', () => {
  let component: ComponentsListComponent;
  let fixture: ComponentFixture<ComponentsListComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ComponentsListComponent ],
      schemas: [
        CUSTOM_ELEMENTS_SCHEMA,
      ],
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ComponentsListComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    component.release = {
      id: '7f9fcfef-c030-41a6-a2cc-329f169e85e5',
      changelog: null,
      tag: '1.0.0',
      date: new Date('12-01-2020'),
      requirements: {
        skills: [],
        components: [],
      },
      size: {
        length: 10,
        width: 10,
        height: 20,
      },
      photos: [],
    };
    expect(component).toBeTruthy();
  });
});
