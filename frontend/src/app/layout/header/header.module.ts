import { CommonModule } from '@angular/common';
import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';
import { ThemeModule } from '@core/theme/theme.module';
import { MenuModule } from '../menu/menu.module';
import { MenuService } from '../menu/menu.service';
import { HeaderComponent } from './header.component';

@NgModule({
  declarations: [
    HeaderComponent,
  ],
  imports: [
    CommonModule,
    ThemeModule,
    MenuModule,
    RouterModule,
  ],
  exports: [
    HeaderComponent,
  ],
  providers: [
    MenuService,
  ],
})
export class HeaderModule { }
