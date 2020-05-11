import { CommonModule } from '@angular/common';
import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { RouterModule, Routes } from '@angular/router';
import { ThemeModule } from '@core/theme/theme.module';
import { SharedModule } from '@shared/shared.module';
import { ComponentsListComponent } from './blueprint/components/components-list/components-list.component';
import { ReleaseSelectorComponent } from './blueprint/components/release-selector/release-selector.component';
import { BlueprintComponent } from './blueprint/pages/blueprint.component';
import { BlueprintCardComponent } from './explorer/components/blueprint-card/blueprint-card.component';
import { ExplorerComponent } from './explorer/pages/explorer/explorer.component';

const routes: Routes = [
  {
    path: 'blueprint',
    component: ExplorerComponent,
  },
  {
    path: 'blueprint/:id',
    component: BlueprintComponent,
  },
];

@NgModule({
  declarations: [
    ExplorerComponent,
    BlueprintCardComponent,
    BlueprintComponent,
    ReleaseSelectorComponent,
    ComponentsListComponent,
  ],
  imports: [
    CommonModule,
    ThemeModule,
    RouterModule.forChild(routes),
    FormsModule,
    SharedModule,
  ],
})
export class ExploreModule { }
