import { CommonModule } from '@angular/common';
import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';
import { ThemeModule } from '@core/theme/theme.module';
import { ButtonComponent } from './button/button.component';
import { MenuItemComponent } from './menu-item/menu-item.component';
import { MenuService } from './menu.service';
import { MenuComponent } from './menu/menu.component';

@NgModule({
  declarations: [
    MenuComponent,
    ButtonComponent,
    MenuItemComponent,
  ],
  imports: [
    CommonModule,
    ThemeModule,
    RouterModule,
  ],
  exports: [
    MenuComponent,
    ButtonComponent,
  ],
  providers: [
    MenuService,
  ],
})
export class MenuModule { }
