import { CommonModule } from '@angular/common';
import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { ThemeModule } from '@core/theme/theme.module';
import { BlueprintCardComponent } from './explorer/components/blueprint-card/blueprint-card.component';
import { ExplorerComponent } from './explorer/pages/explorer/explorer.component';

const routes: Routes = [
  {
    path: '',
    component: ExplorerComponent,
  },
  {
    path: 'explore',
    component: ExplorerComponent,
  },
];

@NgModule({
  declarations: [
    ExplorerComponent,
    BlueprintCardComponent,
  ],
  imports: [
    CommonModule,
    ThemeModule,
    RouterModule.forChild(routes),
  ],
})
export class MakeModule { }
