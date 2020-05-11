import { CommonModule } from '@angular/common';
import { NgModule } from '@angular/core';
import { RouterModule } from '@angular/router';
import { ThemeModule } from '@core/theme/theme.module';
import { DifficultyBadgeComponent } from './components/difficulty-badge/difficulty-badge.component';
import { FavoriteCounterComponent } from './components/favorite-counter/favorite-counter.component';
import { ForkCounterComponent } from './components/fork-counter/fork-counter.component';
import { IssueCounterComponent } from './components/issue-counter/issue-counter.component';
import { SkillBadgeComponent } from './components/skill-badge/skill-badge.component';
import { UserBadgeComponent } from './components/user-badge/user-badge.component';

@NgModule({
  declarations: [
    UserBadgeComponent,
    FavoriteCounterComponent,
    IssueCounterComponent,
    ForkCounterComponent,
    SkillBadgeComponent,
    DifficultyBadgeComponent,
  ],
  imports: [
    CommonModule,
    RouterModule,
    ThemeModule,
  ],
  exports: [
    UserBadgeComponent,
    FavoriteCounterComponent,
    IssueCounterComponent,
    ForkCounterComponent,
    SkillBadgeComponent,
    DifficultyBadgeComponent,
  ],
})
export class SharedModule { }
