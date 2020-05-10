import { User } from '@model/user/user';
import { Difficulty } from './difficulty';
import { Skill } from './skill';

export interface Blueprint {
  owner: User,
  title: string,
  isOfficial: boolean,
  thumbnail: string,
  difficulty: Difficulty,
  skills: Skill[],
  tags: string[],
  likeCount: number,
  createDate: Date,
  updateDate: Date
}
