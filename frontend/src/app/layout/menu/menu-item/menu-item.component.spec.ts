import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';
import { RouterTestingModule } from '@angular/router/testing';
import { MenuItem } from './menu-item';
import { MenuItemComponent } from './menu-item.component';

describe('MenuGroupComponent', () => {
  let component: MenuItemComponent;
  let fixture: ComponentFixture<MenuItemComponent>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ MenuItemComponent ],
      imports: [
        RouterTestingModule,
      ],
      schemas: [
        CUSTOM_ELEMENTS_SCHEMA,
      ],
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MenuItemComponent);
    component = fixture.componentInstance;
  });

  it('should create an item without sub item', () => {
    const item: MenuItem = {
      label: 'item_label',
      icon: 'item_icon',
      link: 'item_link',
    };

    component.item = item;
    fixture.detectChanges();
    expect(component).toBeTruthy();
  });

  it('should create an item with sub items', () => {
    const item: MenuItem = {
      label: 'item_label',
      icon: 'item_icon',
      link: 'item_link',
      subItems: [
        {
          label: 'sub_label',
          link: 'sub_link',
        },
      ],
    };

    component.item = item;
    fixture.detectChanges();
    expect(component).toBeTruthy();
  });
});
