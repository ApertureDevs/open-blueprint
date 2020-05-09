import { Difficulty } from './difficulty';
import { Skill } from './skill';
import { User } from './user';

export interface Blueprint {
  owner: User,
  title: string,
  isOfficial: boolean,
  thumbnail: string,
  difficulty: Difficulty,
  skills: Skill[],
  likeCount: number,
  createDate: Date,
  updateDate: Date
}
