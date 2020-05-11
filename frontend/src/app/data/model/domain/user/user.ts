import { Skill } from '@model/domain/blueprint/skill';
import { Uuid } from '@model/shared/uuid';

export interface User {
  id: Uuid;
  username: string;
  avatar: string | null;
  skills: Skill[];
  email?: string;
}
