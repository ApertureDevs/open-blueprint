import { HttpClientModule } from '@angular/common/http';
import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { CoreModule } from '@core/core.module';
import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HeaderModule } from './layout/header/header.module';
import { MenuModule } from './layout/menu/menu.module';
import { ExplorerModule } from './modules/explorer/explorer.module';
import { LandingModule } from './modules/landing/landing.module';

@NgModule({
  declarations: [
    AppComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    HttpClientModule,
    MenuModule,
    HeaderModule,
    LandingModule,
    ExplorerModule,
    CoreModule,
  ],
  bootstrap: [AppComponent],
})
export class AppModule { }
