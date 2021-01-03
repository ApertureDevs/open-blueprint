import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';
import { ActivatedRoute, ParamMap } from '@angular/router';
import { Observable, of } from 'rxjs';
import { BlueprintComponent } from './blueprint.component';

class ActivatedRouteStub {
  public get paramMap(): Observable<ParamMap> {
    return of({
      has: () => true,
      get: () => '78af4a17-1bc6-4662-83b5-4115036c3912',
      getAll: () => [],
      keys: ['id'],
    });
  }
}

describe('BlueprintComponent', () => {
  let component: BlueprintComponent;
  let fixture: ComponentFixture<BlueprintComponent>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ BlueprintComponent ],
      providers: [
        {
          provide: ActivatedRoute,
          useClass: ActivatedRouteStub,
        },
      ],
      schemas: [
        CUSTOM_ELEMENTS_SCHEMA,
      ],
    })
      .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(BlueprintComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
