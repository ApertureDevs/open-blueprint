import { Component, CUSTOM_ELEMENTS_SCHEMA, Input } from '@angular/core';
import { async, ComponentFixture, TestBed } from '@angular/core/testing';
import { RouterTestingModule } from '@angular/router/testing';
import { MenuItem } from './menu-item';
import { MenuItemComponent } from './menu-item.component';

@Component({
  selector: 'app-menu-item',
  template: '',
})
class MockMenuItemComponent {
  @Input() public item: MenuItem;
}

describe('MenuGroupComponent', () => {
  let component: MenuItemComponent;
  let fixture: ComponentFixture<MenuItemComponent>;

  beforeEach(async(() => {
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
    const item = new MenuItem(
      'item_label',
      'item_icon',
      'item_link',
    );

    component.item = item;
    fixture.detectChanges();
    expect(component).toBeTruthy();
  });

  it('should create an item with sub items', () => {
    const item = new MenuItem(
      'item_label',
      'item_icon',
      'item_link',
      [
        {
          label: 'sub_label',
          link: 'sub_link',
        },
      ],
    );

    component.item = item;
    fixture.detectChanges();
    expect(component).toBeTruthy();
  });
});
