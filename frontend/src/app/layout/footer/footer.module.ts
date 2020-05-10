import { CommonModule } from '@angular/common';
import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';
import { ThemeModule } from '@core/theme/theme.module';
import { FooterComponent } from './footer.component';

@NgModule({
  declarations: [FooterComponent],
  imports: [
    CommonModule,
    ThemeModule,
    RouterModule,
  ],
  exports: [
    FooterComponent,
  ],
})
export class FooterModule { }
