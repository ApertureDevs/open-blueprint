import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

const routes: Routes = [
  {
    path: 'landing',
    loadChildren: () => import('./modules/landing/landing.module').then((module) => module.LandingModule),
  },
  {
    path: 'make',
    loadChildren: () => import('./modules/make/make.module').then((module) => module.MakeModule),
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
