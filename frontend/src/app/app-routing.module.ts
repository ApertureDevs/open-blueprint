import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { ExplorerComponent } from './modules/explorer/pages/explorer/explorer.component';
import { LandingComponent } from './modules/landing/pages/landing/landing.component';

const routes: Routes = [
  {
    path: 'landing',
    component: LandingComponent,
  },
  {
    path: 'make',
    component: ExplorerComponent,
    children: [
      {
        path: 'explore',
        component: ExplorerComponent,
      },
    ],
  },
  {
    path: '**',
    redirectTo: 'landing',
  },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule],
})
export class AppRoutingModule { }
