import { CommonModule } from '@angular/common';
import { NgModule } from '@angular/core';
import { ThemeModule } from '@core/theme/theme.module';
import { BlueprintCardComponent } from './components/blueprint-card/blueprint-card.component';
import { ExplorerComponent } from './pages/explorer/explorer.component';

@NgModule({
  declarations: [
    ExplorerComponent,
    BlueprintCardComponent,
  ],
  imports: [
    CommonModule,
    ThemeModule,
  ],
})
export class ExplorerModule { }
