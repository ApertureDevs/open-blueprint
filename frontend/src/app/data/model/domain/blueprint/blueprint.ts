import { Release } from '@model/domain/blueprint/release';
import { Team } from '@model/domain/team/team';
import { Uuid } from '@model/shared/uuid';
import { Difficulty } from './difficulty';

export interface Blueprint {
  id: Uuid;
  team: Team;
  name: string;
  shortDescription: string;
  longDescription: string;
  isOfficial: boolean;
  difficulty: Difficulty;
  tags: string[];
  favoritesCount: number;
  forkFrom: Blueprint | null;
  forksCount: number;
  openIssuesCount: number;
  releases: Release[];
  thumbnail: string;
  createDate: Date;
  updateDate: Date;
}
